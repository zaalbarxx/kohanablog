<?php

class __Mustache_89fa67e66f50c6b90e3ac67561808c1c extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<!-- app/Resources/views/base.html.twig -->';
        $buffer .= "\n";
        $buffer .= $indent . '<!DOCTYPE html>';
        $buffer .= "\n";
        $buffer .= $indent . '<html>';
        $buffer .= "\n";
        $buffer .= $indent . '    <head>';
        $buffer .= "\n";
        $buffer .= $indent . '        <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />';
        $buffer .= "\n";
        $buffer .= $indent . '        <title>Kohana BLOG - KohaBlog</title>';
        $buffer .= "\n";
        $buffer .= $indent . '        <!--[if lt IE 9]>';
        $buffer .= "\n";
        $buffer .= $indent . '            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
        $buffer .= "\n";
        $buffer .= $indent . '        <![endif]-->';
        $buffer .= "\n";
        $buffer .= $indent . '            <link href=\'http://fonts.googleapis.com/css?family=Irish+Grover\' rel=\'stylesheet\' type=\'text/css\'>';
        $buffer .= "\n";
        $buffer .= $indent . '            <link href=\'http://fonts.googleapis.com/css?family=La+Belle+Aurore\' rel=\'stylesheet\' type=\'text/css\'>';
        $buffer .= "\n";
        $buffer .= $indent . '            <link href="';
        $value = $this->resolveValue($context->find('base'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= 'assets/screen.css" type="text/css" rel="stylesheet" />';
        $buffer .= "\n";
        $buffer .= $indent . '        <link rel="shortcut icon" href="favicon.ico" />';
        $buffer .= "\n";
        $buffer .= $indent . '    </head>';
        $buffer .= "\n";
        $buffer .= $indent . '    <body>';
        $buffer .= "\n";
        $buffer .= $indent . '';
        $buffer .= "\n";
        $buffer .= $indent . '        <section id="wrapper">';
        $buffer .= "\n";
        $buffer .= $indent . '            <header id="header">';
        $buffer .= "\n";
        $buffer .= $indent . '                <div class="top">';
        $buffer .= "\n";
        $buffer .= $indent . '                        <nav>';
        $buffer .= "\n";
        $buffer .= $indent . '                            <ul class="navigation">';
        $buffer .= "\n";
        // 'navi_bar' section
        $buffer .= $this->sectionFfa8a91a97be34c37addd5537d254176($context, $indent, $context->find('navi_bar'));
        $buffer .= $indent . '                            </ul>';
        $buffer .= "\n";
        $buffer .= $indent . '                        </nav>';
        $buffer .= "\n";
        $buffer .= $indent . '                </div>';
        $buffer .= "\n";
        $buffer .= $indent . '';
        $buffer .= "\n";
        $buffer .= $indent . '                <hgroup>';
        $buffer .= "\n";
        $buffer .= $indent . '                    <h2><a href="#">kohablog</a></h2>';
        $buffer .= "\n";
        $buffer .= $indent . '                    <h3><a href="#">creating a blog in Kohana 3.3</a></h3>';
        $buffer .= "\n";
        $buffer .= $indent . '                </hgroup>';
        $buffer .= "\n";
        $buffer .= $indent . '            </header>';
        $buffer .= "\n";
        $buffer .= $indent . '';
        $buffer .= "\n";
        $buffer .= $indent . '            <section class="main-col">';
        $buffer .= "\n";
        if ($partial = $this->mustache->loadPartial('content')) {
            $buffer .= $partial->renderInternal($context, '            ');
        }
        $buffer .= $indent . '            </section>';
        $buffer .= "\n";
        $buffer .= $indent . '            <aside class="sidebar">';
        $buffer .= "\n";
        $buffer .= $indent . '            </aside>';
        $buffer .= "\n";
        $buffer .= $indent . '';
        $buffer .= "\n";
        $buffer .= $indent . '            <div id="footer">';
        $buffer .= "\n";
        $buffer .= $indent . '                    Kohana blog - based on Symfony 2 Blog by <a href="https://github.com/dsyph3r">dsyph3r</a>';
        $buffer .= "\n";
        $buffer .= $indent . '            </div>';
        $buffer .= "\n";
        $buffer .= $indent . '        </section>';
        $buffer .= "\n";
        $buffer .= $indent . '    </body>';
        $buffer .= "\n";
        $buffer .= $indent . '</html>';

        return $buffer;
    }

    private function sectionFfa8a91a97be34c37addd5537d254176(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                <li><a href="{{url}}">{{name}}</a></li>
                            ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '                                <li><a href="';
                $value = $this->resolveValue($context->find('url'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a></li>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
