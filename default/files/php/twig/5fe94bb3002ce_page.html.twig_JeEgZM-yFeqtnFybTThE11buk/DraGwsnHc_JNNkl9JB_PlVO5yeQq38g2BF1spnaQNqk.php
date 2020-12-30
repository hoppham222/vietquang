<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* sites/all/themes/giaidieu/templates/pages/page.html.twig */
class __TwigTemplate_3230025014c2150dcb9d1a88e7d0e8026160fa7c217ad40e6194c85e81b714ba extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 57];
        $filters = ["escape" => 47];
        $functions = ["drupal_breadcrumb" => 52];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                ['drupal_breadcrumb']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 44
        echo "<div id=\"page-wrapper\" class=\"clearfix\">
  <!-- Header -->
  <div id=\"header\" class=\"clearfix\">
    ";
        // line 47
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true));
        echo "
  </div>
  
  <!-- Breadcrumbs -->
\t<div id=\"breadcrumbs\" class=\"clearfix\">
    <div class=\"container\">";
        // line 52
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBreadcrumb(), "html", null, true));
        echo "</div>
  </div>

  <!-- Main page -->
  <div id=\"main\" class=\"clearfix\">
    ";
        // line 57
        if ($this->getAttribute(($context["page"] ?? null), "sidebar", [])) {
            // line 58
            echo "    <div class=\"container\">
      <div class=\"row\">
        <div class=\"sidebar col-md-3\">
          <button class=\"cate-product__icon\" onclick=\"giaidieu_toogle_cate(this)\"><i class=\"fas fa-arrow-right\"></i></button>
          ";
            // line 62
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar", [])), "html", null, true));
            echo "
        </div>
        <div class=\"main col-md-9\">";
            // line 64
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true));
            echo "</div>
      </div>
    </div>
    ";
        } else {
            // line 68
            echo "    <div class=\"container\">
      ";
            // line 69
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true));
            echo "
    </div>
    ";
        }
        // line 72
        echo "  </div>

  <!-- Footer -->
  <div id=\"footer\" class=\"clearfix\">
    ";
        // line 76
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true));
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/pages/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 76,  105 => 72,  99 => 69,  96 => 68,  89 => 64,  84 => 62,  78 => 58,  76 => 57,  68 => 52,  60 => 47,  55 => 44,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/pages/page.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/pages/page.html.twig");
    }
}
