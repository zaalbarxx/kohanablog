<?php

class __Mustache_70235c0232ff8809c02cb25d2d53d4cd extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'blog' section
        $buffer .= $this->section4ec79c3155d6c0b383d89dc64aed9570($context, $indent, $context->find('blog'));
        if ($partial = $this->mustache->loadPartial('comments/index')) {
            $buffer .= $partial->renderInternal($context, '');
        }

        return $buffer;
    }

    private function section4ec79c3155d6c0b383d89dc64aed9570(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <article class="blog">
        <header>
            <div class="date"><time datetime="{{created}}">{{created}}</time></div>
            <h2>{{title}}</h2>
        </header>
        <div>
            <p>{{blog}}</p>
        </div>
    </article>
    ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '    <article class="blog">';
                $buffer .= "\n";
                $buffer .= $indent . '        <header>';
                $buffer .= "\n";
                $buffer .= $indent . '            <div class="date"><time datetime="';
                $value = $this->resolveValue($context->find('created'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('created'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</time></div>';
                $buffer .= "\n";
                $buffer .= $indent . '            <h2>';
                $value = $this->resolveValue($context->find('title'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</h2>';
                $buffer .= "\n";
                $buffer .= $indent . '        </header>';
                $buffer .= "\n";
                $buffer .= $indent . '        <div>';
                $buffer .= "\n";
                $buffer .= $indent . '            <p>';
                $value = $this->resolveValue($context->find('blog'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</p>';
                $buffer .= "\n";
                $buffer .= $indent . '        </div>';
                $buffer .= "\n";
                $buffer .= $indent . '    </article>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
