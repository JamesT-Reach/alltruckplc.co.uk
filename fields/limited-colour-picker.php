<?php

class acf_field_limited_colour_picker extends acf_field
{
	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct()
	{
		// vars
		$this->name = 'limited_colour_picker';
		$this->label = __("Limited Colour Picker",'acf');
		$this->category = __("Choice",'acf');
		$this->defaults = array(
			'choices'			=>	array()
		);
		
		
		// do not delete!
    	parent::__construct();
  
	}
	
		
	
	
	
	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	
	function create_options( $field )
	{
		// vars
		$key = $field['name'];
		
		// implode checkboxes so they work in a textarea
		if( is_array($field['choices']) )
		{		
			foreach( $field['choices'] as $k => $v )
			{
				$field['choices'][ $k ] = $k . ' : ' . $v;
			}
			$field['choices'] = implode("\n", $field['choices']);
		}
		
		?>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label for=""><?php _e("Choices",'acf'); ?></label>
				<p class="description"><?php _e("Enter your colour hex codes and labels,<br>one per line:",'acf'); ?><br />
				<br />
				<?php _e("#FF0000 : Red",'acf'); ?><br />
				<?php _e("#0000FF : Blue",'acf'); ?><br />
				</p>
			</td>
			<td>
				<?php
				
				do_action('acf/create_field', array(
					'type'	=>	'textarea',
					'class' => 	'textarea field_option-choices',
					'name'	=>	'fields['.$key.'][choices]',
					'value'	=>	$field['choices'],
				));
				
				?>
				
			</td>
		</tr>
		
		
		<?php
		
	}
	
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function create_field( $field )
	{
		
		// vars
		$i = 0;
		$e = '<ul class="acf-radio-list ' . esc_attr($field['class']) . ' ' . esc_attr($field['layout']) . '">';
		
		$my_choices = $field['choices'];
		
		$the_choices = explode("\n", $my_choices);
		
		
		foreach($the_choices as $c){
		
			$atts = "";
		
			$j = explode(" : ", $c);
		
			if( $field['value'] === false )
				{
					if( $i === 0 )
					{
						$atts = 'checked="checked" data-checked="checked"';
					}
				}
				else
				{
					if( $j[0] === $field['value'] )
					{
						$atts = 'checked="checked" data-checked="checked"';
					}
				}
		
			
			$e .= '<li><div style="background: ' . $j[0] . '; width: 60px; height: 25px; float: left; margin-right: 10px; margin-bottom: 3px;"></div> <label><input id="' . esc_attr($field['id']) . '-' . $j[1] . '" type="radio" name="' . esc_attr($field['name']) . '" value="' . $j[0] . '" ' . esc_attr( $atts ) . ' />' . $j[1] . '</label></li>';
			$e .= '<div style="clear: both"></div>';
			
			$i++;
		}
		
		
		$e .= "</ul>";
		
		
		
		
		
		echo $e;
		
	}
	
	
	
	
	

	
	
	
	
}

new acf_field_limited_colour_picker();

?>