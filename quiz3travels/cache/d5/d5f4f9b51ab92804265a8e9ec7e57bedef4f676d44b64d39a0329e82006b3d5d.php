<?php

/* book.html.twig */
class __TwigTemplate_37b4c0937d69d96d9e03ebd20b39d2ed6d38d9cfb939c48014ee1010d72c1e6c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "book.html.twig", 1);
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Bookings";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    ";
        // line 7
        if ((isset($context["sessionUser"]) ? $context["sessionUser"] : null)) {
            // line 8
            echo "        <p>Hello ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sessionUser"]) ? $context["sessionUser"] : null), "name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sessionUser"]) ? $context["sessionUser"] : null), "passport", array()), "html", null, true);
            echo ". You want to travel </p>

        ";
            // line 10
            if ((isset($context["errorList"]) ? $context["errorList"] : null)) {
                // line 11
                echo "            <ul>
                ";
                // line 12
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["errorList"]) ? $context["errorList"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 13
                    echo "                    <li>";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</li>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 14
                echo "   
            </ul>

        ";
            }
            // line 18
            echo "        
    ";
        } else {
            // line 20
            echo "        <p>You are not logged in. You may <a href=\"/login\">Login</a> or <a href=\"/register\">Register</a></p>  <br><br>  
    ";
        }
        // line 22
        echo "



    <form method=\"post\">
        From: <input type=\"text\" name=\"fromAirport\"><br><br>
        To: <input type=\"text\" name=\"toAirport\"><br><br>
        <input type=\"submit\" value=\"Book\">
    </form>

";
    }

    public function getTemplateName()
    {
        return "book.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 22,  79 => 20,  75 => 18,  69 => 14,  60 => 13,  56 => 12,  53 => 11,  51 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends \"master.html.twig\"%}

{% block title %}Bookings{% endblock %}

{% block content %}

    {% if sessionUser %}
        <p>Hello {{sessionUser.name}} {{sessionUser.passport}}. You want to travel </p>

        {% if errorList %}
            <ul>
                {% for error in errorList %}
                    <li>{{error}}</li>
                    {% endfor %}   
            </ul>

        {% endif %}
        
    {% else %}
        <p>You are not logged in. You may <a href=\"/login\">Login</a> or <a href=\"/register\">Register</a></p>  <br><br>  
    {% endif %}




    <form method=\"post\">
        From: <input type=\"text\" name=\"fromAirport\"><br><br>
        To: <input type=\"text\" name=\"toAirport\"><br><br>
        <input type=\"submit\" value=\"Book\">
    </form>

{% endblock %}
";
    }
}
