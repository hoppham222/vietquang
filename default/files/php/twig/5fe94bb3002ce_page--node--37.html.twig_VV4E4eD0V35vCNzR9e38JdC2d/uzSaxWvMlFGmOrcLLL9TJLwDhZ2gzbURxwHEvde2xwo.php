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

/* sites/all/themes/giaidieu/templates/pages/page--node--37.html.twig */
class __TwigTemplate_8b1d0b8d92007ad4e9d0a656457b7effcfab19326003e9ca6e937615aee3c5ee extends \Twig\Template
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
        $functions = ["drupal_breadcrumb" => 52, "drupal_entity" => 61, "drupal_view" => 62];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['drupal_breadcrumb', 'drupal_entity', 'drupal_view']
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
        echo "<div id=\"page-wrapper\" class=\"page-gioi-thieu clearfix\">
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
    <div class=\"container introduce\">
      ";
        // line 58
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true));
        echo "
      
      <div class=\"sidebar col-md-3 col-xs-12\">
        ";
        // line 61
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block", "danhmucsanpham_2"), "html", null, true));
        echo "
        ";
        // line 62
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("commerce_product_functions", "block_san_pham_ban_chay_gt"), "html", null, true));
        echo "
      </div>
      <div class=\"main col-md-9 col-xs-12\">
        <h1 class=\"page-title\">Giới thiệu về Việt Quang Huế</h1>
        <div class=\"introduce-image\">";
        // line 66
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block_content", "9"), "html", null, true));
        echo "</div>
        ";
        // line 67
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("node_block_functions", "block_khach_hang"), "html", null, true));
        echo "
      </div>
      
      <div class=\"col-md-12 col-xs-12 introduce_bottom\">";
        // line 70
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block_content", "10"), "html", null, true));
        echo "</div>
    </div>
  </div>

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
        return "sites/all/themes/giaidieu/templates/pages/page--node--37.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 76,  104 => 70,  98 => 67,  94 => 66,  87 => 62,  83 => 61,  77 => 58,  68 => 52,  60 => 47,  55 => 44,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/pages/page--node--37.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/pages/page--node--37.html.twig");
    }
}
