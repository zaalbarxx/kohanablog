<?php

class __Mustache_631716f67a58e67054fdeeaf86efdd4a extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<h2>Contact KohaBlog</h2>';
        $buffer .= "\n";
        $buffer .= $indent . 'If you want to contact us, please, fill form below :) .';
        $buffer .= "\n";
        // 'form' section
        $buffer .= $this->section9e1b129f5e1aa0bce9342c72904c34ba($context, $indent, $context->find('form'));

        return $buffer;
    }

    private function section9e1b129f5e1aa0bce9342c72904c34ba(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
{{.}}
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= $indent . call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
