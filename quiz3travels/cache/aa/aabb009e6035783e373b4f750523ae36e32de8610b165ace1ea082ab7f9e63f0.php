<?php

/* register_success.html.twig */
class __TwigTemplate_df2bb07f59ed2c4a030f28fe6c613f10807e2ec11f39087b2134e9f532c7af5b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("master.html.twig", "register_success.html.twig", 3);
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
        echo "Successful registration";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
    <p>New passenger was registered succesfully</p>
    <a href=\"/login\"> Click to login </a>


";
    }

    public function getTemplateName()
    {
        return "register_success.html.twig";
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
        return "{# empty Twig template #}

{% extends \"master.html.twig\"%}

{% block title %}Successful registration{% endblock %}

{% block content %}

    <p>New passenger was registered succesfully</p>
    <a href=\"/login\"> Click to login </a>


{% endblock %}
";
    }
}
