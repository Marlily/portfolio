(function (blocks, blockEditor, element, components) {
    'use strict';

    var el              = element.createElement;
    var registerBlock   = blocks.registerBlockType;
    var MediaUploadCheck = blockEditor.MediaUploadCheck;
    var MediaUpload     = blockEditor.MediaUpload;
    var useBlockProps   = blockEditor.useBlockProps;
    var Button          = components.Button;

    registerBlock('qort/slider-zdjec', {
        edit: function (props) {
            var imageIds  = props.attributes.imageIds || [];
            var blockProps = useBlockProps({
                style: {
                    background: 'rgba(255,255,255,0.03)',
                    border: '1px dashed rgba(255,255,255,0.15)',
                    borderRadius: '0.75rem',
                    padding: '1.5rem',
                    display: 'flex',
                    flexDirection: 'column',
                    gap: '0.75rem',
                },
            });

            return el('div', blockProps,
                el('strong', { style: { color: '#BF6E2E' } }, 'Slider ze zdjęciami'),
                el(MediaUploadCheck, null,
                    el(MediaUpload, {
                        onSelect: function (media) {
                            props.setAttributes({
                                imageIds: media.map(function (m) { return m.id; }),
                            });
                        },
                        allowedTypes: ['image'],
                        multiple: 'add',
                        gallery: true,
                        value: imageIds,
                        render: function (obj) {
                            return el(Button, { onClick: obj.open, variant: 'secondary' },
                                imageIds.length
                                    ? imageIds.length + ' zdjęć – edytuj galerię'
                                    : 'Dodaj zdjęcia'
                            );
                        },
                    })
                )
            );
        },
        save: function () { return null; },
    });

}(window.wp.blocks, window.wp.blockEditor, window.wp.element, window.wp.components));
