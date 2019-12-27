<?php
namespace ide\formats\form\elements;

use ide\Ide;
use ide\editors\value\BooleanPropertyEditor;
use ide\editors\value\ColorPropertyEditor;
use ide\editors\value\FontPropertyEditor;
use ide\editors\value\IntegerPropertyEditor;
use ide\editors\value\PositionPropertyEditor;
use ide\editors\value\SimpleTextPropertyEditor;
use ide\editors\value\TextPropertyEditor;
use ide\formats\form\AbstractFormElement;
use php\gui\UXButton;
use php\gui\UXNode;
use php\gui\UXTableCell;
use php\gui\UXTextField;
use php\gui\UXTitledPane;
use php\gui\designer\UXDesignProperties;
use php\gui\designer\UXDesignPropertyEditor;
use php\gui\layout\UXAnchorPane;
use php\gui\layout\UXHBox;

/**
 * Class ButtonFormElement
 * @package ide\formats\form
 */
class TitledPaneFormElement extends AbstractFormElement
{
    public function getGroup()
    {
        return 'ui.group.panes::Панели';
    }

    public function getElementClass()
    {
        return UXTitledPane::class;
    }

    public function getName()
    {
        return 'ui.element.spoiler::Спойлер';
    }

    public function getIcon()
    {
        return 'icons/layout16.png';
    }

    public function getIdPattern()
    {
        return "spoiler%s";
    }

    public function isLayout()
    {
        return true;
    }

    public function addToLayout($self, $node, $screenX = null, $screenY = null)
    {
        /** @var UXTitledPane $self */

        if (!$self->content) {
            $self->content = $node;
        } else {
            $node->position = $self->content->screenToLocal($screenX, $screenY);
            $self->content->add($node);
        }
    }

    public function getLayoutChildren($layout)
    {
        return $layout->content->children;
    }

    /**
     * @return UXNode
     */
    public function createElement()
    {   
        $name = Ide::get()->getLocalizer()->translate($this->getName());
        $button = new UXTitledPane($name);
        $button->content = new UXAnchorPane();
        return $button;
    }

    public function getDefaultSize()
    {
        return [150, 100];
    }

    public function isOrigin($any)
    {
        return $any instanceof UXTitledPane;
    }
}
