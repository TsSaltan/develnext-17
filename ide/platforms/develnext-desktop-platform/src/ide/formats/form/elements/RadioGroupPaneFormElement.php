<?php
namespace ide\formats\form\elements;

use ide\Ide;
use ide\formats\form\AbstractFormElement;
use php\gui\UXListView;
use php\gui\UXNode;
use php\gui\UXRadioGroupPane;

/**
 * @package ide\formats\form
 */
class RadioGroupPaneFormElement extends AbstractFormElement
{
    public function getName()
    {
        return 'ui.element.radio.group.pane::Переключатели';
    }

    public function getGroup()
    {
        return 'ui.group.additional::Дополнительно';
    }

    public function getElementClass()
    {
        return UXRadioGroupPane::class;
    }

    public function getIcon()
    {
        return 'icons/radioButtons16.png';
    }

    public function getIdPattern()
    {
        return "radioGroup%s";
    }

    /**
     * @return UXNode
     */
    public function createElement()
    {   
        $name = Ide::get()->getLocalizer()->translate($this->getName());
        $button = new UXRadioGroupPane();
        $button->items->addAll([$name . ' 1', $name . ' 2', $name . ' 3']);

        return $button;
    }

    public function getDefaultSize()
    {
        return [150, -1];
    }

    public function isOrigin($any)
    {
        return $any instanceof UXRadioGroupPane;
    }
}
