<?php

/* login.html.twig */
class __TwigTemplate_259ae4c5fea74067da0ea0267718aa9345ca6e2e043d6106811c1cf2417ea9e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "login.html.twig", 1);
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
        echo "Log In";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div id=\"divLogin\">
        <h2>Log In</h2>
        <p>Don't have an account? <a href='/register'>Sign up</a></p>

        <div id=\"divLoginFacebook\">
            <button type=\"button\" id=\"buttonFbLogin\"><img src=\"/facebook-login.png\" 
          style=\"width: 200px\"></button>
        </div>
        
        <p>---------------- or use your email---------------------</p>

        ";
        // line 17
        if ((isset($context["loginFailed"]) ? $context["loginFailed"] : null)) {
            // line 18
            echo "            <p>Invalid username or password</p>
        ";
        }
        // line 20
        echo "

        <form method=\"post\">
            <label for=\"loginEmail\">Email Address</label><br>
                <input type=\"text\" name=\"email\"><br><br>
           <label for=\"loginEmail\">Password</label><br>
               <input type=\"password\" name=\"pass\"><br><br>
               
            <input type=\"submit\" value=\"Log In\"><br><br>
        </form>
        
        <a href=\"\">Forgot your password?</a><br><br>
    </div>

";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 20,  53 => 18,  51 => 17,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends \"master.html.twig\" %}

{% block title %}Log In{% endblock %}

{% block content %}
    <div id=\"divLogin\">
        <h2>Log In</h2>
        <p>Don't have an account? <a href='/register'>Sign up</a></p>

        <div id=\"divLoginFacebook\">
            <button type=\"button\" id=\"buttonFbLogin\"><img src=\"/facebook-login.png\" 
          style=\"width: 200px\"></button>
        </div>
        
        <p>---------------- or use your email---------------------</p>

        {% if loginFailed %}
            <p>Invalid username or password</p>
        {% endif %}


        <form method=\"post\">
            <label for=\"loginEmail\">Email Address</label><br>
                <input type=\"text\" name=\"email\"><br><br>
           <label for=\"loginEmail\">Password</label><br>
               <input type=\"password\" name=\"pass\"><br><br>
               
            <input type=\"submit\" value=\"Log In\"><br><br>
        </form>
        
        <a href=\"\">Forgot your password?</a><br><br>
    </div>

{% endblock %}";
    }
}
