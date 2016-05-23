<?php

namespace app\Observer;

class SlugGenerateObserver
{
    public function saving($model)
    {
        if (!empty($model->name)) {
            $model->slug = str_slug($model->name, '-');
        } elseif (!empty($model->title)) {
            $model->slug = str_slug($model->title, '-');
        }
    }

    public function saved($model)
    {
    }
}
