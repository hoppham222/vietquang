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

/* sites/all/themes/giaidieu/templates/pages/page--tin-tuc.html.twig */
class __TwigTemplate_83a2a9c52c5037d34be008a61484e4f4c0a0b9ff4a83cc9c2b82cc35c0e1e1db extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 47];
        $functions = ["drupal_breadcrumb" => 52, "drupal_view" => 62];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['drupal_breadcrumb', 'drupal_view']
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
\t<!-- Header -->
\t<div id=\"header\" class=\"clearfix\">
\t\t";
        // line 47
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true));
        echo "
\t</div>

  <!-- Breadcrumbs -->
\t<div id=\"breadcrumbs\" class=\"clearfix\">
    <div class=\"container\">";
        // line 52
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBreadcrumb(), "html", null, true));
        echo "</div>
  </div>

\t<!-- Main page -->
\t<div id=\"main\" class=\"clearfix\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"main col-md-9\">";
        // line 59
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true));
        echo "</div>
\t\t\t\t<div class=\"sidebar col-md-3\">
\t\t\t\t\t";
        // line 62
        echo "\t\t\t\t\t";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("node_block_functions", "block_tin_xem_nhieu"), "html", null, true));
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<!-- Footer -->
\t<div id=\"footer\" class=\"clearfix\">
\t\t";
        // line 70
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true));
        echo "
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/pages/page--tin-tuc.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 70,  83 => 62,  78 => 59,  68 => 52,  60 => 47,  55 => 44,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/pages/page--tin-tuc.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/pages/page--tin-tuc.html.twig");
    }
}
