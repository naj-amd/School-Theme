/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
import { InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl  } from '@wordpress/components';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	return (
		<>	
			<InspectorControls>
				<PanelBody title={__('Animation Setting','school-blocks')}>
					<SelectControl
						label={__('Select Animation','school-blocks')}
						value={attributes.animation}
						options={[
							{ label: __('None','school-blocks'), value: 'none' },
							{ label: __('Fade Up','school-blocks'), value: 'fade-up' },
							{ label: __('Fade Down','school-blocks'), value: 'fade-down' },
							{ label: __('Fade Left','school-blocks'), value: 'fade-left'},
							{ label: __('Fade Right','school-blocks'), value: 'fade-right'},
							{ label: __('Slide','school-blocks'), value: 'slide' },
						]}
						onChange={(newAnimation) => setAttributes({ animation: newAnimation })}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...useBlockProps()} data-aos={attributes.animation}>
				<InnerBlocks />
			</div>
		</>
	);
}
