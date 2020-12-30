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

/* sites/all/themes/giaidieu/templates/commerce/commerce-product--teaser.html.twig */
class __TwigTemplate_e06064c5d85663ac47b225a43a3a22039d7748a43ded74f08c70a228f2adba6a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 27];
        $filters = ["escape" => 24];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
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
        // line 24
        echo "<div class=\"product product-teaser product-";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product_entity"] ?? null), "id", [])), "html", null, true));
        echo " product-type-";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["product_type"] ?? null)), "html", null, true));
        echo "\">
  <!-- Images -->
  <div class=\"product-image-wrapper\">
    ";
        // line 27
        if ($this->getAttribute(($context["product"] ?? null), "variation_field_images", [])) {
            // line 28
            echo "    ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["product"] ?? null), "variation_field_images", []), 0, [], "array")), "html", null, true));
            echo "
    ";
        } else {
            // line 30
            echo "    <span class=\"image-empty\">Chưa có ảnh sản phẩm</span>
    ";
        }
        // line 32
        echo "    
    <!-- Product btn -->
    <div class=\"product-btn-wrapper\">
      <a class=\"product-btn product-btn--contact\" href=\"tel:0935121010\">Liên hệ</a>
      <a class=\"product-btn product-btn--price-quote\" href=\"#\" pid=\"";
        // line 36
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product_entity"] ?? null), "id", [])), "html", null, true));
        echo "\" onclick=\"custom_commerce_product_add_to_cart(this); return false;\">Báo giá</a>
    </div>
  </div>

  <!-- Product info -->
  <div class=\"product-info-wrapper\">
    <p class=\"product-item field-title\"><a href=\"";
        // line 42
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["product_url"] ?? null)), "html", null, true));
        echo "\" title=\"Xem chi tiết SP: ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["product_entity"] ?? null), "title", []), "value", [])), "html", null, true));
        echo "\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["product_entity"] ?? null), "title", []), "value", [])), "html", null, true));
        echo "</a></p>
    <!--<p class=\"product-item field-price price value\">";
        // line 43
        echo "</p>-->
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/commerce/commerce-product--teaser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 43,  91 => 42,  82 => 36,  76 => 32,  72 => 30,  66 => 28,  64 => 27,  55 => 24,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/commerce/commerce-product--teaser.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/commerce/commerce-product--teaser.html.twig");
    }
}
