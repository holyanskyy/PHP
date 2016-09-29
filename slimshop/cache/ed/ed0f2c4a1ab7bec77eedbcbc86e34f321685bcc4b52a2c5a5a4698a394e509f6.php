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
        echo "e-shop";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
    <h1>Welcome to e-shop</h1>

    ";
        // line 10
        if ((isset($context["sessionUser"]) ? $context["sessionUser"] : null)) {
            // line 11
            echo "        <p>Hello ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sessionUser"]) ? $context["sessionUser"] : null), "name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sessionUser"]) ? $context["sessionUser"] : null), "email", array()), "html", null, true);
            echo ". You may <a href=\"/logout\">Logout</a></p>
    ";
        } else {
            // line 13
            echo "        <p>You are not logged in. You may <a href=\"/login\">Login</a> or <a href=\"/register\">Register</a></p>  <br><br>  
    ";
        }
        // line 15
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
        return array (  57 => 15,  53 => 13,  45 => 11,  43 => 10,  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}
{% extends \"master.html.twig\"%}

{% block title %}e-shop{% endblock %}

{% block content %}

    <h1>Welcome to e-shop</h1>

    {% if sessionUser %}
        <p>Hello {{sessionUser.name}} {{sessionUser.email}}. You may <a href=\"/logout\">Logout</a></p>
    {% else %}
        <p>You are not logged in. You may <a href=\"/login\">Login</a> or <a href=\"/register\">Register</a></p>  <br><br>  
    {% endif %}




{% endblock %}

";
    }
}
