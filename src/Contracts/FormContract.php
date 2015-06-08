<?php

namespace DraperStudio\Forms\Contracts;

interface FormContract
{
    /**
     * Get the fields that apply to the form.
     *
     * @return array
     */
    public function fields();

    /**
     * Get the label widths that apply to the form.
     *
     * @return array
     */
    public function labelWidths();

    /**
     * Get the field widths that apply to the form.
     *
     * @return array
     */
    public function fieldWidths();

    /**
     * Get the submit button width that apply to the form.
     *
     * @return array
     */
    public function buttonWidths();
}
