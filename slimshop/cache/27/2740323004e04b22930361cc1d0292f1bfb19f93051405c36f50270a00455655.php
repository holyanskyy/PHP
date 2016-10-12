<?php

/* error_internal.html.twig */
class __TwigTemplate_29d36837ddfcc155c22fb74fb6dfca6c66adcf4bee08b0f0aefc194fb0b2a150 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("master.html.twig", "error_internal.html.twig", 3);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Internal error";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
<h1>Internal error</h1>
<img src=\"/media/ninja.png\" width=\"150\">
<p>Our appologies. We've encountered an internal error in our system</p>

<p><a href='/'>click here</a> to continue</p>

";
    }

    public function getTemplateName()
    {
        return "error_internal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 8,  35 => 7,  29 => 5,  11 => 3,);
    }

    public function getSource()
    {
        return "
{# empty Twig template #}
{% extends \"master.html.twig\"%}

{% block title %}Internal error{% endblock %}

{% block content %}

<h1>Internal error</h1>
<img src=\"/media/ninja.png\" width=\"150\">
<p>Our appologies. We've encountered an internal error in our system</p>

<p><a href='/'>click here</a> to continue</p>

{% endblock %}

";
    }
}
