<?php

/* index.html.twig */
class __TwigTemplate_1186c061694f516e7af4a7485c8b569594e72e19577623afcaa9a52c61375f47 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "index.html.twig", 2);
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
        echo "Home page";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
    ";
        // line 8
        if ((isset($context["user"]) ? $context["user"] : null)) {
            // line 9
            echo "        <p>You are logged in as ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["users"]) ? $context["users"] : null), "name", array()), "html", null, true);
            echo ". You may <a href=\"/logout\">Logout</a></p>
    ";
        } else {
            // line 11
            echo "        <p>You are not logged in. <a href=\"/login\">Login</a> or <a href=\"/register\">Register</a></p>  <br><br>  
    ";
        }
        // line 13
        echo "

";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 13,  49 => 11,  43 => 9,  41 => 8,  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}
{% extends \"master.html.twig\"%}

{% block title %}Home page{% endblock %}

{% block content %}

    {% if user %}
        <p>You are logged in as {{users.name}}. You may <a href=\"/logout\">Logout</a></p>
    {% else %}
        <p>You are not logged in. <a href=\"/login\">Login</a> or <a href=\"/register\">Register</a></p>  <br><br>  
    {% endif %}


{% endblock %}

";
    }
}
