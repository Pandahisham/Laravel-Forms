<?php

namespace DraperStudio\Forms\Contracts;

interface FormBuilderContract
{
    /**
     * Render the Form class into HTML.
     *
     * @return \Illuminate\View\View
     */
    public function basic();

    /**
     * Render the Form class into HTML with inline-style.
     *
     * @return \Illuminate\View\View
     */
    public function inline();

    /**
     * Render the Form class into HTML horizontal-style.
     *
     * @return \Illuminate\View\View
     */
    public function horizontal();
}
