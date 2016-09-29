<?php

/* logout_success.html.twig */
class __TwigTemplate_c646ec199043c58eb99363be821b8d6485c8ee6f8dc5036a26391e3a86d7f26b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "logout_success.html.twig", 2);
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Log out";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "<h1>You are logged out</h1>
<a href=\"/\">Click to continue</a>

";
    }

    public function getTemplateName()
    {
        return "logout_success.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}
{% extends \"master.html.twig\"%}

{% block title %}Log out{% endblock %}

{% block content %}
<h1>You are logged out</h1>
<a href=\"/\">Click to continue</a>

{% endblock %}
";
    }
}
