<?php

namespace RendyYangAsli\LaravelUniqueSlugGenerator;

/**
 * @author muhajirin <muhajirinlpu@gmail.com>
 * at 10/22/18 , 8:40 AM
 */
trait UniqueSlugTrait
{
    public static function bootUniqueSlugTrait()
    {
        self::creating(function (UniqueSlugGeneratorContract $model) {
            $model->slug = self::getInstance()->createSlug($model, $model->getSluggableValue());
        });

        self::updating(function (UniqueSlugGeneratorContract $model) {
            $model->slug = self::getInstance()->createSlug($model, $model->getSluggableValue(), $model->id);
        });
    }

    public static function getInstance()
    {
        return new UniqueSlugGenerator();
    }
}