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

/* sites/all/themes/giaidieu/templates/pages/page--front.html.twig */
class __TwigTemplate_be9e7dc94f87a9a455c43c476818f0c2ad5560aeda01a9b5831ecb66201fec61 extends \Twig\Template
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
        $functions = ["drupal_messages" => 50, "drupal_view" => 61, "drupal_entity" => 62];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['drupal_messages', 'drupal_view', 'drupal_entity']
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
        echo "<div id=\"page-wrapper\" class=\"front clearfix\">
  <!-- Header -->
  <div id=\"header\" class=\"clearfix\">
    ";
        // line 47
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true));
        echo "
  </div>
  
  ";
        // line 50
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalMessages(), "html", null, true));
        echo "
  
  <!-- Highlight area -->
  <div id=\"highlight\" class=\"clearfix\">
    <div class=\"container\">
     
\t\t\t\t<div id=\"homepage-product-category-wrapper\" class=\"col-lg-3\">
\t\t\t\t\t";
        // line 57
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar", [])), "html", null, true));
        echo "
\t\t\t\t</div>
\t\t\t
\t\t\t\t<div id=\"slideshow-wrapper\" class=\"col-lg-9\">
\t\t\t\t\t";
        // line 61
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("node_block_functions", "block_slideshow"), "html", null, true));
        echo "
\t\t\t\t\t";
        // line 62
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block_content", 7), "html", null, true));
        echo "
\t\t\t\t</div>
\t\t
    </div>
  </div>
  
  <!-- Main page -->
  <div id=\"main\" class=\"clearfix\">
    <div class=\"container\">
     
\t\t\t";
        // line 72
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("commerce_product_functions", "block_combo_uu_dai"), "html", null, true));
        echo "
      ";
        // line 73
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("commerce_product_functions", "block_den_trang_tri"), "html", null, true));
        echo "
      ";
        // line 74
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("commerce_product_functions", "block_san_pham_ban_chay"), "html", null, true));
        echo "
      ";
        // line 75
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("commerce_product_functions", "block_dien_chieu_sang"), "html", null, true));
        echo "
      ";
        // line 76
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("commerce_product_functions", "block_dien_dan_dung"), "html", null, true));
        echo "
\t\t 
\t\t</div>
\t\t<!-- Gioi thieu -->
\t\t<div class=\"wapper_introduce_home_page\">
\t\t\t<div class=\"introduce_content col-sm-6\">";
        // line 81
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block_content", 8), "html", null, true));
        echo "</div>
\t\t\t<div class=\"introduce_banner col-sm-6\"><img src=\"/sites/all/themes/giaidieu/images/banner_about_us.png\" alt=\"\"></div>
\t\t</div>
\t\t<!-- tin tức -->
\t\t<div class=\"wapper_news_home_page\">
\t\t\t<div class=\"container\">
\t\t\t\t
\t\t\t\t\t";
        // line 88
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("node_block_functions", "block_tin_trang_chu"), "html", null, true));
        echo "
\t\t\t\t
\t\t\t</div>
\t\t</div>
  </div>

  <!-- Footer -->
  <div id=\"footer\" class=\"clearfix\">
    ";
        // line 96
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true));
        echo "
  </div>
</div>

<!-- Meta data -->
";
        // line 101
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null)), "html", null, true));
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/pages/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 101,  145 => 96,  134 => 88,  124 => 81,  116 => 76,  112 => 75,  108 => 74,  104 => 73,  100 => 72,  87 => 62,  83 => 61,  76 => 57,  66 => 50,  60 => 47,  55 => 44,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/pages/page--front.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/pages/page--front.html.twig");
    }
}
