<?php

if (!function_exists('forms')) {
    /**
     * [forms description].
     *
     * @param string $form
     *
     * @return \DraperStudio\Forms\Contracts\Form
     */
    function forms($form)
    {
        $form = config('forms.aliases.'.$form);

        if (empty($form)) {
            new InvalidArgumentException("Alias [$form] is not defined.");
        }

        return app()->make($form);
    }
}
