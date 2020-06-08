<?php

namespace Elementor\Core\Kits\Documents\Tabs;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Controls\Repeater as Global_Style_Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Global_Style extends Tab_Base {

	public function get_id() {
		return 'global-style';
	}

	public function get_title() {
		return __( 'Colors & Typography', 'elementor' );
	}

	public function register_tab_controls() {
		$this->start_controls_section(
			'section_global_colors',
			[
				'label' => __( 'Global Colors', 'elementor' ),
				'tab' => $this->get_id(),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'color',
			[
				'type' => Controls_Manager::COLOR,
				'label_block' => true,
				'dynamic' => [],
			]
		);

		$this->add_control(
			'system_colors',
			[
				'type' => Global_Style_Repeater::CONTROL_TYPE,
				'fields' => $repeater->get_controls(),
				'item_actions' => [
					'add' => false,
					'remove' => false,
				],
			]
		);

		$this->add_control(
			'custom_colors',
			[
				'type' => Global_Style_Repeater::CONTROL_TYPE,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_text_style',
			[
				'label' => __( 'Global Text Styles', 'elementor' ),
				'tab' => $this->get_id(),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'styles',
				'label' => '',
				'fields_options' => [
					'font_family' => [
						'selectors' => [
							'{{SELECTOR}}' => '--e-global-style-{{external:CONTAINER.id}}-family: {{VALUE}}',
						],
					],
				],
			]
		);

		$this->add_control(
			'system_typography',
			[
				'type' => Global_Style_Repeater::CONTROL_TYPE,
				'fields' => $repeater->get_controls(),
				'item_actions' => [
					'add' => false,
					'remove' => false,
				],
			]
		);

		$this->add_control(
			'custom_typography',
			[
				'type' => Global_Style_Repeater::CONTROL_TYPE,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();
	}
}