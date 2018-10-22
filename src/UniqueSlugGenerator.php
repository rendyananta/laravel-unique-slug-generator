<?php
/**
 * @author <Rendy rendy.ananta66@gmail.com>
 * Date: 06/08/17
 * Time: 6:03
 */

namespace RendyYangAsli\LaravelUniqueSlugGenerator;


class UniqueSlugGenerator
{

    /**
     * fire event create slug when creating by `model observe`
     *
     * @param UniqueSlugGeneratorContract $model
     */
    public function creating (UniqueSlugGeneratorContract $model)
    {
        $model->slug = $this->createSlug($model, $model->getSluggableValue());
    }

    /**
     * fire event create slug when updating by `model observe`
     *
     * @param UniqueSlugGeneratorContract $model
     */
    public function updating (UniqueSlugGeneratorContract $model)
    {
        $this->createSlug($model, $model->getSluggableValue(), $model->id);
    }

    /**
     * Create slug from attribute
     *
     * @param UniqueSlugGeneratorContract $model
     * @param $sluggableValue
     * @param int $id
     * @return mixed
     */
    public function createSlug (UniqueSlugGeneratorContract $model, $sluggableValue, $id = 0)
    {
        $slug = str_slug($sluggableValue);

        $allSlugs = $this->getRelatedSlugs($model, $slug, $id);

        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $newSlug = $slug . '-' . $i;
        while ($allSlugs->contains('slug', $newSlug)) {
            $newSlug = $slug . '-' . $i;

            if (! $allSlugs->contains('slug', $newSlug)) {
                break;   
            }
            $i++;
        }
        return $newSlug;
    }

    /**
     * get related slug
     *
     * @param UniqueSlugGeneratorContract $model
     * @param $slug
     * @param int $id
     * @return mixed
     */
    public function getRelatedSlugs(UniqueSlugGeneratorContract $model, $slug, $id = 0)
    {
        return $model->select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}