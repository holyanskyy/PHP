<?php

/* login_register.html.twig */
class __TwigTemplate_1d5870e6769d9a70ed7f72a89ac177ef901d441f20cd99604d622ced12b8e006 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "login_register.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
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
        echo "Register";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script>
        \$(document).ready(function (){
          \$('input[name=email]').keyup(function(){
            \$('#result').load('/emailexists/' + \$(this).val()); 
              
          });  
        });

    </script>

    <style>
        #message{
            color: red;
            font-weight: bold;
        }
    </style>
";
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        // line 26
        echo "    <h1>Register user</h1>

    ";
        // line 28
        if ((isset($context["errorList"]) ? $context["errorList"] : null)) {
            // line 29
            echo "        <ul>
            ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errorList"]) ? $context["errorList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 31
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "   
        </ul>

    ";
        }
        // line 36
        echo "    <form method=\"post\">
        <label for=\"name\">First Name:</label> 
        <input type=\"text\" name=\"name\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "name", array()), "html", null, true);
        echo "\"<br><br><br>

        <label for=\"email\"> Email: </label> 
        <input type=\"text\" name=\"email\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "email", array()), "html", null, true);
        echo "\">
        <span id=\"result\"></span><br><br>

        <label for=\"pass1\">Password: </label> 
        <input type=\"password\" name=\"pass1\"><br><br>

        <label for=\"pass1\">Password (repeated): </label> 
        <input type=\"password\" name=\"pass2\"><br><br>

        <input type=\"submit\" value=\"Register\"><br><br>
    </form>



";
    }

    public function getTemplateName()
    {
        return "login_register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 41,  95 => 38,  91 => 36,  85 => 32,  76 => 31,  72 => 30,  69 => 29,  67 => 28,  63 => 26,  60 => 25,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends \"master.html.twig\"%}

{% block title %}Register{% endblock %}

{% block head %}
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script>
        \$(document).ready(function (){
          \$('input[name=email]').keyup(function(){
            \$('#result').load('/emailexists/' + \$(this).val()); 
              
          });  
        });

    </script>

    <style>
        #message{
            color: red;
            font-weight: bold;
        }
    </style>
{% endblock %}

{% block content %}
    <h1>Register user</h1>

    {% if errorList %}
        <ul>
            {% for error in errorList %}
                <li>{{error}}</li>
                {% endfor %}   
        </ul>

    {% endif %}
    <form method=\"post\">
        <label for=\"name\">First Name:</label> 
        <input type=\"text\" name=\"name\" value=\"{{v.name}}\"<br><br><br>

        <label for=\"email\"> Email: </label> 
        <input type=\"text\" name=\"email\" value=\"{{v.email}}\">
        <span id=\"result\"></span><br><br>

        <label for=\"pass1\">Password: </label> 
        <input type=\"password\" name=\"pass1\"><br><br>

        <label for=\"pass1\">Password (repeated): </label> 
        <input type=\"password\" name=\"pass2\"><br><br>

        <input type=\"submit\" value=\"Register\"><br><br>
    </form>



{% endblock %}
";
    }
}
