<?php

namespace Drupal\cc_views_field\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\Random;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * A handler to provide a field that is completely custom by the administrator.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("cost_calculator_views_field")
 */
class CostCalculatorViewsField extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function usesGroupBy() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Do nothing -- to override the parent query.
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['hide_alter_empty'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    // Return a random text, here you can include your custom logic.
    // Include any namespace required to call the method required to generate
    // the desired output.
    //$random = new Random();
    //return $random->name();

    $displaytitle = ($this->view->field['field_display_title']->original_value);
    $thisdegree = ($this->view->field['field_degree']->original_value);
    $unitcost = ($this->view->field['field_cost_per_credit']->original_value);
    $unitcost = strval($unitcost);
    $unitcost = intval($unitcost);
    $sixless = 51;
    $sixlessinc = 25;
    $sevenmore = 228;
$output = "
<div class=\"text-size-h4 ce-table-caption\"><strong>".$displaytitle."</strong><br>".$thisdegree."</div>
<div class =\"table-responsive\">
<table class = \"table-hover table-striped\">
<thead>
<tr>
<th scope=\"col\">Units</th>
<th scope=\"col\">Tuition</th>
<!-- <th scope=\"col\"><a data-toggle=\"modal\" data-target=\"#fee-explanation\" style=\"color:#8f1124; text-decoration:underline; cursor: pointer;\">Mandatory Fees</a></th> -->
<th scope=\"col\"><a href=\"/explanation-mandatory-fees\" target=\"_blank\">Mandatory Fees</a></th> 
<th scope=\"col\">Total</th>
</tr>
</thead>
<tbody>
<tr>

<td>1</td>
<td>$".$unitcost.".00</td>
<td>$".$sixless.".50</td>
<td>$".($unitcost+$sixless).".50 </td>
</tr>

<tr>
<td>2</td>
<td>$".(2*$unitcost).".00</td>
<td>$".($sixless+$sixlessinc).".50</td>
<td>$".((2*$unitcost)+$sixless+$sixlessinc).".50 </td>
</tr>


<tr>
<td>3</td>
<td>$".(3*$unitcost).".00</td>
<td>$".($sixless+(2*$sixlessinc)).".50</td>
<td>$".((3*$unitcost)+$sixless+(2*$sixlessinc)).".50 </td>
</tr>


<tr>
<td>4</td>
<td>$".(4*$unitcost).".00</td>
<td>$".($sixless+(3*$sixlessinc)).".50</td>
<td>$".((4*$unitcost)+$sixless+(3*$sixlessinc)).".50 </td>
</tr>

<tr>
<td>5</td>
<td>$".(5*$unitcost).".00</td>
<td>$".($sixless+(4*$sixlessinc)).".50</td>
<td>$".((5*$unitcost)+$sixless+(4*$sixlessinc)).".50 </td>
</tr>

<tr>
<td>6</td>
<td>$".(6*$unitcost).".00</td>
<td>$".($sixless+(5*$sixlessinc)).".50</td>
<td>$".((6*$unitcost)+$sixless+(5*$sixlessinc)).".50 </td>
</tr>

<tr>
<td>7</td>
<td>$".(7*$unitcost).".00</td>
<td>$".$sevenmore.".00</td>
<td>$".((7*$unitcost)+$sevenmore).".00 </td>
</tr>
    <tr>
 <td>8</td>
<td>$".(8*$unitcost).".00</td>
<td>$".$sevenmore.".00</td>
<td>$".((8*$unitcost)+$sevenmore).".00 </td>
</tr>
    <tr>

  <td>9</td>
<td>$".(9*$unitcost).".00</td>
<td>$".$sevenmore.".00</td>
<td>$".((9*$unitcost)+$sevenmore).".00 </td>
</tr>

</tbody>

</table>
<p><strong>Note:</strong> Unless otherwise indicated, there is no tuition cap for per unit programs. To calculate the cost for additional units beyond this rate table, add the cost per unit (1 unit of TUITION) to the TOTAL for each additional unit.</p><p> Some classes may have course-specific fees which are assessed in addition to mandatory fees. Please see the Special Course Fees page at <a href=\"http://registrar.arizona.edu/special-course-fees\" target=\"_blank\">http://registrar.arizona.edu/special-course-fees</a> for further information. <br><em> iCourse fees listed on the Special Course Fees page do <strong>not</strong> apply to University of Arizona Online students.</em></p>
  </div>

  <!-- <div class=\"modal fade\" id=\"fee-explanation\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"thismodallabel\">
  <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
  <div class=\"modal-header\">
  <h3 class=\"modal-title\" id=\"thismodallabel\">Explanation of mandatory fees</h3>
  </div>
  <div class=\"modal-body\">
  <p><b>Arizona Financial Aid Trust (AFAT) Fee</b></p>
  <p>The Arizona Student Association, along with the Arizona Board of Regents and the Arizona State Legislature, created the Arizona Financial Aid Trust program in 1989. It provides state-based financial aid to students who are underrepresented in the university population or to university students who demonstrate a clear need for financial aid by virtue of their special circumstances. Students approved the AFAT fee through student referenda on Arizona's university campuses, and the fee began in the Fall 1990 semester.</p>
  <p>This fee is reduced if the student is taking fewer than 7 units and refunded if dropping to 0 units, in accordance with the regular <a href=\"https://bursar.arizona.edu/refunds/options/policies\">University refund policy</a>.</p>
    <p><b>Information Technology/Library Fee</b></p>
    <p>Starting Fall Semester, 2021, Arizona Online students will be charged a prorated amount of the library component of the Information Technology/Library Fee.</p>
    <p>This fee is refundable if dropping to 0 units, in accordance with the regular <a href=\"https://bursar.arizona.edu/refunds/options/policies\">University refund policy</a>.<br>You can find the full Technology/Library Fee description <a href=\"https://bursar.arizona.edu/tuition/fees/descriptions\">here</a>.
    
  </div>
  <div class=\"modal-footer\">
  <button type=\"button\" class=\"btn btn-blue btn-sm px-3\" data-dismiss=\"modal\">Close</button>
  </div> -->
  </div>
  </div>
  </div>

  </div>

";

    return check_markup($output, 'full_html');
  }

}
<?php

namespace Drupal\cc_views_field\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\Random;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * A handler to provide a field that is completely custom by the administrator.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("cost_calculator_views_field")
 */
class CostCalculatorViewsField extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function usesGroupBy() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Do nothing -- to override the parent query.
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['hide_alter_empty'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    // Return a random text, here you can include your custom logic.
    // Include any namespace required to call the method required to generate
    // the desired output.
    //$random = new Random();
    //return $random->name();

    $displaytitle = ($this->view->field['field_display_title']->original_value);
    $thisdegree = ($this->view->field['field_degree']->original_value);
    $unitcost = ($this->view->field['field_cost_per_credit']->original_value);
    $unitcost = strval($unitcost);
    $unitcost = intval($unitcost);
    $sixless = 51;
    $sixlessinc = 25;
    $sevenmore = 228;
$output = "
<div class=\"text-size-h4 ce-table-caption\"><strong>".$displaytitle."</strong><br>".$thisdegree."</div>
<div class =\"table-responsive\">
<table class = \"table-hover table-striped\">
<thead>
<tr>
<th scope=\"col\">Units</th>
<th scope=\"col\">Tuition</th>
<th scope=\"col\"><a data-toggle=\"modal\" data-target=\"#fee-explanation\" style=\"color:#8f1124; text-decoration:underline; cursor: pointer;\">Mandatory Fees</a></th>
<th scope=\"col\">Total</th>
</tr>
</thead>
<tbody>
<tr>

<td>1</td>
<td>$".$unitcost.".00</td>
<td>$".$sixless.".50</td>
<td>$".($unitcost+$sixless).".50 </td>
</tr>

<tr>
<td>2</td>
<td>$".(2*$unitcost).".00</td>
<td>$".($sixless+$sixlessinc).".50</td>
<td>$".((2*$unitcost)+$sixless+$sixlessinc).".50 </td>
</tr>


<tr>
<td>3</td>
<td>$".(3*$unitcost).".00</td>
<td>$".($sixless+(2*$sixlessinc)).".50</td>
<td>$".((3*$unitcost)+$sixless+(2*$sixlessinc)).".50 </td>
</tr>


<tr>
<td>4</td>
<td>$".(4*$unitcost).".00</td>
<td>$".($sixless+(3*$sixlessinc)).".50</td>
<td>$".((4*$unitcost)+$sixless+(3*$sixlessinc)).".50 </td>
</tr>

<tr>
<td>5</td>
<td>$".(5*$unitcost).".00</td>
<td>$".($sixless+(4*$sixlessinc)).".50</td>
<td>$".((5*$unitcost)+$sixless+(4*$sixlessinc)).".50 </td>
</tr>

<tr>
<td>6</td>
<td>$".(6*$unitcost).".00</td>
<td>$".($sixless+(5*$sixlessinc)).".50</td>
<td>$".((6*$unitcost)+$sixless+(5*$sixlessinc)).".50 </td>
</tr>

<tr>
<td>7</td>
<td>$".(7*$unitcost).".00</td>
<td>$".$sevenmore.".00</td>
<td>$".((7*$unitcost)+$sevenmore).".00 </td>
</tr>
    <tr>
 <td>8</td>
<td>$".(8*$unitcost).".00</td>
<td>$".$sevenmore.".00</td>
<td>$".((8*$unitcost)+$sevenmore).".00 </td>
</tr>
    <tr>

  <td>9</td>
<td>$".(9*$unitcost).".00</td>
<td>$".$sevenmore.".00</td>
<td>$".((9*$unitcost)+$sevenmore).".00 </td>
</tr>

</tbody>

</table>
<p><strong>Note:</strong> Unless otherwise indicated, there is no tuition cap for per unit programs. To calculate the cost for additional units beyond this rate table, add the cost per unit (1 unit of TUITION) to the TOTAL for each additional unit.</p><p> Some classes may have course-specific fees which are assessed in addition to mandatory fees. Please see the Special Course Fees page at <a href=\"http://registrar.arizona.edu/special-course-fees\" target=\"_blank\">http://registrar.arizona.edu/special-course-fees</a> for further information. <br><em> iCourse fees listed on the Special Course Fees page do <strong>not</strong> apply to University of Arizona Online students.</em></p>
  </div>

  <div class=\"modal fade\" id=\"fee-explanation\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"thismodallabel\">
  <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
  <div class=\"modal-header\">
  <h3 class=\"modal-title\" id=\"thismodallabel\">Explanation of mandatory fees</h3>
  </div>
  <div class=\"modal-body\">
  <p><b>Arizona Financial Aid Trust (AFAT) Fee</b></p>
  <p>The Arizona Student Association, along with the Arizona Board of Regents and the Arizona State Legislature, created the Arizona Financial Aid Trust program in 1989. It provides state-based financial aid to students who are underrepresented in the university population or to university students who demonstrate a clear need for financial aid by virtue of their special circumstances. Students approved the AFAT fee through student referenda on Arizona's university campuses, and the fee began in the Fall 1990 semester.</p>
  <p>This fee is reduced if the student is taking fewer than 7 units and refunded if dropping to 0 units, in accordance with the regular <a href=\"https://bursar.arizona.edu/refunds/options/policies\">University refund policy</a>.</p>
    <p><b>Information Technology/Library Fee</b></p>
    <p>Starting Fall Semester, 2021, Arizona Online students will be charged a prorated amount of the library component of the Information Technology/Library Fee.</p>
    <p>This fee is refundable if dropping to 0 units, in accordance with the regular <a href=\"https://bursar.arizona.edu/refunds/options/policies\">University refund policy</a>.<br>You can find the full Technology/Library Fee description <a href=\"https://bursar.arizona.edu/tuition/fees/descriptions\">here</a>.
    
  </div>
  <div class=\"modal-footer\">
  <button type=\"button\" class=\"btn btn-blue btn-sm px-3\" data-dismiss=\"modal\">Close</button>
  </div>
  </div>
  </div>
  </div>

  </div>

";

    return check_markup($output, 'full_html');
  }

}
