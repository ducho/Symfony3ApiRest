<?php

/* @Twig/Exception/exception.json.twig */
class __TwigTemplate_13aee802f9257b7fa352be01da5fc0236b47a4f8d80d7a388fe203ad779ffc7a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0f27d30fd27c20bb40f90b8ae09d926ffe61cf02a5ec649d560444d1b441a650 = $this->env->getExtension("native_profiler");
        $__internal_0f27d30fd27c20bb40f90b8ae09d926ffe61cf02a5ec649d560444d1b441a650->enter($__internal_0f27d30fd27c20bb40f90b8ae09d926ffe61cf02a5ec649d560444d1b441a650_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_0f27d30fd27c20bb40f90b8ae09d926ffe61cf02a5ec649d560444d1b441a650->leave($__internal_0f27d30fd27c20bb40f90b8ae09d926ffe61cf02a5ec649d560444d1b441a650_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}*/
/* */
