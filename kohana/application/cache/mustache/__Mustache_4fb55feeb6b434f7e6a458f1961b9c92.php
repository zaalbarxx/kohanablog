<?php

class __Mustache_4fb55feeb6b434f7e6a458f1961b9c92 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<h2>Contact KohaBlog</h2>';
        $buffer .= "\n";
        $buffer .= $indent . 'If you want to contact us, please, fill form below :).';
        $buffer .= "\n";
        $buffer .= $indent . '';
        $buffer .= "\n";
        // 'contact_form' section
        $buffer .= $this->section6b81eb529e05c554887adeabedaf0993($context, $indent, $context->find('contact_form'));

        return $buffer;
    }

    private function section6b81eb529e05c554887adeabedaf0993(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
{{{.}}}
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= $indent . $value;
                $buffer .= '';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
