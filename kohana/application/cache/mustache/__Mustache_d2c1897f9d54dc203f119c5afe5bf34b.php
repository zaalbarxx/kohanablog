<?php

class __Mustache_d2c1897f9d54dc203f119c5afe5bf34b extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= "\n";
        $buffer .= $indent . '        <h3>Add Comment</h3>';
        $buffer .= "\n";
        if ($partial = $this->mustache->loadPartial('status')) {
            $buffer .= $partial->renderInternal($context, '');
        }
        // 'comments_form' section
        $buffer .= $this->sectionF6fe65520e600bb6b32b689e686a321c($context, $indent, $context->find('comments_form'));

        return $buffer;
    }

    private function sectionF6fe65520e600bb6b32b689e686a321c(Mustache_Context $context, $indent, $value)
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
                $buffer .= $indent . '                          ';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= $value;
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
