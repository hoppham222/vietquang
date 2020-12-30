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

/* sites/all/themes/giaidieu/templates/commerce/commerce-product.html.twig */
class __TwigTemplate_72e29cc06f4fa5a4097d18fadb1f1aa36d5617d89de26bd81cb61cd09a08f3ac extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 26, "for" => 153, "set" => 156];
        $filters = ["escape" => 22];
        $functions = ["drupal_entity" => 70, "drupal_view" => 179];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['escape'],
                ['drupal_entity', 'drupal_view']
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
        // line 22
        echo "<div class=\"product product-full product-";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product_entity"] ?? null), "id", [])), "html", null, true));
        echo " product-type-";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["product_type"] ?? null)), "html", null, true));
        echo " clearfix\">
  <div class=\"product-header clearfix\">
    <div class=\"row\">
      <div class=\"col-4-5\">
        ";
        // line 26
        if ($this->getAttribute(($context["product"] ?? null), "variation_field_images", [])) {
            // line 27
            echo "        ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_images", [])), "html", null, true));
            echo "
        ";
        } else {
            // line 29
            echo "          <div class=\"product-header__no-image\">
            <img src=\"/sites/default/files/default_images/noimage.png\" alt=\"Ảnh sản phẩm\" />
          </div>
        ";
        }
        // line 33
        echo "      </div>
      <div class=\"col-4-5\">
        <!-- Product title -->
        <h1 class=\"page-title\">";
        // line 36
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["product_entity"] ?? null), "title", []), "value", [])), "html", null, true));
        echo " (";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_sku", [])), "html", null, true));
        echo ")</h1>

        <!-- Product price -->
        <div class=\"price-wrapper\">
          <p class=\"price value\">";
        // line 40
        echo " Liên hệ</p>
        </div>
        
        <!-- Product basic info -->
        <div class=\"basic-info row\">
          <div class=\"col-md-6\">
            ";
        // line 47
        echo "            ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_bao_hanh", [])), "html", null, true));
        echo "
            ";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_dien_tich_phong", [])), "html", null, true));
        echo "
          </div>
          <div class=\"col-md-6\">
            ";
        // line 51
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_thuong_hieu", [])), "html", null, true));
        echo "
            ";
        // line 52
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_chat_lieu_den", [])), "html", null, true));
        echo "
          </div>
        </div>
        
        <!-- Add to cart form -->
        <div class=\"add-to-cart-form\">
          ";
        // line 58
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variations", [])), "html", null, true));
        echo "
          <div class=\"social-share-links\">";
        // line 59
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "addtoany", [])), "html", null, true));
        echo "</div>
          <div class=\"custom-bang-gia\"><span>Xem bảng giá</span><a href=\"/\" class=\"btn btn-link\">tại đây</a></div>
        </div>
      </div>
      <div class=\"col-md-3 product-header__right\">
        ";
        // line 70
        echo "        ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block_content", 11), "html", null, true));
        echo "
        ";
        // line 71
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block_content", 5), "html", null, true));
        echo "
        ";
        // line 73
        echo "      </div>
    </div>
  </div>
  
  <!-- Product tabs -->

  <div id=\"custom-tabs\" class=\"clearfix\">
    <ul>
      ";
        // line 81
        if ((($context["product_type"] ?? null) == "product")) {
            // line 82
            echo "        <li rel=\"product-thong-so-ky-thuat\" class=\"active\">Thông số kỹ thuật</li>
      ";
        }
        // line 84
        echo "        <li rel=\"product-mo-ta\" ";
        if ((($context["product_type"] ?? null) != "product")) {
            echo " class=\"active\" ";
        }
        echo ">Mô tả</li>
        <li rel=\"product-danh-gia\">Đánh giá</li>
    </ul>
  </div>

  
  <!-- Product body -->
  <div class=\"product-body clearfix\">
    ";
        // line 92
        if ((($context["product_type"] ?? null) == "product")) {
            // line 93
            echo "    <!-- Thong so ky thuat -->
    <div id=\"product-thong-so-ky-thuat\" class=\"clearfix table-responsive\">
      <h2 class=\"section-title\">Thông số kỹ thuật:</h2>
      <table class=\"table table_product_detail\">
        <thead class=\"table-header\">
          <tr class=\"table__tr\">
            <th class=\"table__td\">Thông số điện:</th>
            <th class=\"table__td\">Thông số quang:</th>
            <th class=\"table__td\">Đóng gói:</th>
\t\t\t\t\t</tr>
        </thead>
        
        <tbody class=\"table-body\">
          <tr class=\"table__tr\">
            <td class=\"table__td\">";
            // line 107
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_dien_ap", [])), "html", null, true));
            echo "</td>
            <td class=\"table__td\">";
            // line 108
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_nhiet_do_mau", [])), "html", null, true));
            echo "</td>
            <td class=\"table__td\">";
            // line 109
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_kich_thuoc_hop", [])), "html", null, true));
            echo "</td>
\t\t\t\t\t</tr>
          <tr class=\"table__tr\">
            <td class=\"table__td\">";
            // line 112
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_cong_suat", [])), "html", null, true));
            echo "</td>
            <td class=\"table__td\">";
            // line 113
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_hieu_suat_sang", [])), "html", null, true));
            echo "</td>
            <td class=\"table__td\">";
            // line 114
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_trong_luong_tinh", [])), "html", null, true));
            echo "</td>
\t\t\t\t\t</tr>
          <tr class=\"table__tr\">
            <td class=\"table__td\">";
            // line 117
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_he_so_cong_suat", [])), "html", null, true));
            echo "</td>
            <td class=\"table__td\">";
            // line 118
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_chi_so_hoan_mau", [])), "html", null, true));
            echo "</td>
            <td class=\"table__td\">";
            // line 119
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_kich_thuoc_san_pham", [])), "html", null, true));
            echo "</td>
\t\t\t\t\t</tr>
          <tr class=\"table__tr\">
            <td class=\"table__td\">&nbsp;</td>
            <td class=\"table__td\">";
            // line 123
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_tuoi_tho", [])), "html", null, true));
            echo "</td>
            <td class=\"table__td\">&nbsp;</td>
\t\t\t\t\t</tr>
        </tbody>
      </table>
    </div>
    ";
        }
        // line 130
        echo "    
    <!-- Mo ta san pham -->
    <div id=\"product-mo-ta\" class=\"clearfix\">
      <h2 class=\"section-title\">Mô tả sản phẩm</h2>
      ";
        // line 134
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "variation_field_mo_ta_san_pham", [])), "html", null, true));
        echo "
    </div>

    <!-- Danh gia san pham -->
    <div id=\"product-danh-gia\" class=\"clearfix\">
      <h2 class=\"section-title\">Đánh giá sản phẩm</h2>

        ";
        // line 141
        if (($this->getAttribute(($context["comment_stats"] ?? null), "total_count", []) > 0)) {
            // line 142
            echo "        <div class=\"comment-wrapper\">
          <!-- Rating stats -->
          <div class=\"comment-stats-wrapper row\">
            <div class=\"col-xs-4\">
              <div class=\"stats-overall\">
                <p class=\"stats-averate\">";
            // line 147
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["comment_stats"] ?? null), "rating_average", [])), "html", null, true));
            echo " <span><i class=\"fa fa-star\" aria-hidden=\"true\"></i></span></p>
                <p class=\"stats-total-count\">";
            // line 148
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["comment_stats"] ?? null), "total_count", [])), "html", null, true));
            echo " đánh giá</p>
              </div>
            </div>
            <div class=\"col-xs-8\">
              <div class=\"stats-details\">
                ";
            // line 153
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["comment_stats"] ?? null), "ratings", []));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 154
                echo "                <div class=\"stats-row\">
                  <div class=\"rating-star\">";
                // line 155
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true));
                echo " <i class=\"fa fa-star\" aria-hidden=\"true\"></i></div>
                  ";
                // line 156
                $context["rating_percentage"] = (($context["value"] / $this->getAttribute(($context["comment_stats"] ?? null), "total_count", [])) * 100);
                // line 157
                echo "                  <div class=\"stats-background\"><div class=\"stats-progress\" style=\"width: ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rating_percentage"] ?? null)), "html", null, true));
                echo "%;\"></div></div>
                  <div class=\"rating-count\">";
                // line 158
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["value"]), "html", null, true));
                echo "</div>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            echo "              </div>
            </div>
          </div>
          ";
            // line 164
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "field_comments", [])), "html", null, true));
            echo "
        </div>
        ";
        } else {
            // line 167
            echo "        <div class=\"comment-wrapper no-comment\">
          <p class=\"empty-text\">Chưa có đánh giá nào cho sản phẩm này.</p>
          ";
            // line 169
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["product"] ?? null), "field_comments", [])), "html", null, true));
            echo "
        </div>
        ";
        }
        // line 172
        echo "    </div>
  </div>

  <!-- Product footer -->
  <div class=\"product-footer clearfix\">
    <!-- San pham lien quan -->
    <div class=\"product-relatives-wrapper\">
      ";
        // line 179
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, views_embed_view("commerce_product_functions", "block_san_pham_lien_quan", $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute(($context["product_entity"] ?? null), "field_danh_muc_san_pham", []), "entity", []), "id", []))), "html", null, true));
        echo "
    </div>
  </div>
\t
\t<div class=\"zalo-chat-widget\" data-oaid=\"28024157673834418\" data-welcome-message=\"Rất vui khi được hỗ trợ bạn!\" data-autopopup=\"0\" data-width=\"350\" data-height=\"420\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/commerce/commerce-product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  341 => 179,  332 => 172,  326 => 169,  322 => 167,  316 => 164,  311 => 161,  302 => 158,  297 => 157,  295 => 156,  291 => 155,  288 => 154,  284 => 153,  276 => 148,  272 => 147,  265 => 142,  263 => 141,  253 => 134,  247 => 130,  237 => 123,  230 => 119,  226 => 118,  222 => 117,  216 => 114,  212 => 113,  208 => 112,  202 => 109,  198 => 108,  194 => 107,  178 => 93,  176 => 92,  162 => 84,  158 => 82,  156 => 81,  146 => 73,  142 => 71,  137 => 70,  129 => 59,  125 => 58,  116 => 52,  112 => 51,  106 => 48,  101 => 47,  93 => 40,  84 => 36,  79 => 33,  73 => 29,  67 => 27,  65 => 26,  55 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/commerce/commerce-product.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/commerce/commerce-product.html.twig");
    }
}
