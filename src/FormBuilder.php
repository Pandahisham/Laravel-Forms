<?php

namespace DraperStudio\Forms;

use DraperStudio\Forms\Contracts\FormBuilderContract;

class FormBuilder implements FormBuilderContract
{
    /**
     * Render the Form class into HTML.
     *
     * @return \Illuminate\View\View
     */
    public function basic()
    {
        return $this->render('forms::basic');
    }

    /**
     * Render the Form class into HTML with inline-style.
     *
     * @return \Illuminate\View\View
     */
    public function inline()
    {
        return $this->render('forms::inline');
    }

    /**
     * Render the Form class into HTML horizontal-style.
     *
     * @return \Illuminate\View\View
     */
    public function horizontal()
    {
        return $this->render('forms::horizontal');
    }

    /**
     * Render the Form class into HTML.
     *
     * @param string $view
     *
     * @return \Illuminate\View\View
     */
    private function render($view)
    {
        return view($view, [
            'fields'       => $this->fields(),
            'route'        => $this->route,
            'method'       => $this->method,
            'submit'       => $this->submit,
            'labelWidths'  => $this->generateLabelClasses(),
            'fieldWidths'  => $this->generateFieldClasses(),
            'buttonWidths' => $this->generateButtonClasses(),
            'helpOffsets'  => $this->generateHelpClasses(),
        ]);
    }

    /**
     * Generate all column classes for labels.
     *
     * @return string
     */
    private function generateLabelClasses()
    {
        return $this->generateClasses($this->labelWidths());
    }

    /**
     * Generate all column classes for fields.
     *
     * @return string
     */
    private function generateFieldClasses()
    {
        return $this->generateClasses($this->fieldWidths());
    }

    /**
     * Generate all column classes for buttons.
     *
     * @return string
     */
    private function generateButtonClasses()
    {
        return $this->generateClasses($this->buttonWidths());
    }

    /**
     * Generate all column classes for help-blocks.
     *
     * @return string
     */
    private function generateHelpClasses()
    {
        $classes = null;

        foreach ($this->labelWidths() as $key => $value) {
            $fieldWidth = 12 - $value;
            $offset     = ' col-'.$key.'-offset-'.$value;
            $column     = ' col-'.$key.'-'.$fieldWidth;

            if (in_array($key, ['xs', 'sm'])) {
                continue;
            }

            if (empty($fieldWidth)) {
                $classes .= $offset;
            } else {
                $classes .= $column.$offset;
            }
        }

        return ltrim($classes);
    }

    /**
     * Generate all column classes for the given data.
     *
     * @param array $data
     *
     * @return string
     */
    private function generateClasses($data)
    {
        $classes = null;

        foreach ($data as $key => $value) {
            $classes .= ' col-'.$key.'-'.$value;
        }

        return ltrim($classes);
    }
}
