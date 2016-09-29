<?php

/* index.html.twig */
class __TwigTemplate_2d53997c3103f06001bb8b7eeacfd73692767fc068df0986f9135907abedb93b extends Twig_Template
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
        echo "Travels";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
    <h1>Welcome to travels</h1>

    ";
        // line 10
        if ((isset($context["sessionUser"]) ? $context["sessionUser"] : null)) {
            // line 11
            echo "        <p>Hello ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sessionUser"]) ? $context["sessionUser"] : null), "name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sessionUser"]) ? $context["sessionUser"] : null), "passport", array()), "html", null, true);
            echo ". You may <a href=\"/book\">Book</a> or <a href=\"/logout\">Logout</a></p>

        ";
            // line 13
            if ((isset($context["bookingsList"]) ? $context["bookingsList"] : null)) {
                // line 14
                echo "
        ";
            } else {
                // line 16
                echo "
            <p>There are no bookings yet</p>

        ";
            }
            // line 20
            echo "

    ";
        } else {
            // line 23
            echo "        <p>You are not logged in. You may <a href=\"/login\">Login</a> or <a href=\"/register\">Register</a></p>  <br><br>  
    ";
        }
        // line 25
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
        return array (  74 => 25,  70 => 23,  65 => 20,  59 => 16,  55 => 14,  53 => 13,  45 => 11,  43 => 10,  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}
{% extends \"master.html.twig\"%}

{% block title %}Travels{% endblock %}

{% block content %}

    <h1>Welcome to travels</h1>

    {% if sessionUser %}
        <p>Hello {{sessionUser.name}} {{sessionUser.passport}}. You may <a href=\"/book\">Book</a> or <a href=\"/logout\">Logout</a></p>

        {% if bookingsList %}

        {% else %}

            <p>There are no bookings yet</p>

        {% endif %}


    {% else %}
        <p>You are not logged in. You may <a href=\"/login\">Login</a> or <a href=\"/register\">Register</a></p>  <br><br>  
    {% endif %}




{% endblock %}

";
    }
}
