<?php
/* $Id: List.php,v 1.1 2002/12/12 11:01:24 robbat2 Exp $ */

class DataStructure_List {
    var $nodeFront = null;
    var $nodeBack = null;
    var $size = 0;

    function DataStructure_List() {
        $this->emptyList();
    }

    function emptyList() {
        $this->nodeFront = null;
        $this->nodeBack = null;
        $this->size = 0;
    }

    function addFirst(&$data) {
        $this->node =& new DataStructure_List_Node($data);
        $this->size++;
        if($this->nodeFront == null) {
            $this->nodeFront =& $node;
            $this->nodeBack =& $node;
        } else {
            $this->nodeFront->insertListNodeBefore($node);
            $this->nodeFront =& $node;
        }
    }
    
    function addLast(&$data) {
        $node =& new DataStructure_List_Node($data);
        $this->size++;
        if($this->nodeBack == null) {
            $this->nodeFront =& $node;
            $this->nodeBack =& $node;
        } else {
            $this->nodeBack->insertListNodeAfter($node);
            $this->nodeBack =& $node;
        }
    }

    function &getFirst() {
        return $this->nodeFront->getData();
    }
    function &getLast() {
        return $this->nodeBack->getData();
    }
    function &removeFirst() {
        $tmp = $this->nodeFront;
        if($tmp != null) {
            $data = $tmp->getData();
            $next =& $tmp->getNext();
            if($next !== null) {
                $next->unsetPrev();
                $this->nodeFront =& $next;
            }
            return $data;
        } else {
            return null;
        }
    }
    function &removeLast() {
        $tmp = $this->nodeBack;
        if($tmp != null) {
            $data = $tmp->getData();
            $prev =& $tmp->getPrev();
            if($prev != null) {
                $prev->unsetNext();
                $this->nodeBack =& $prev;
            }
            return $data;
        } else {
            return null;
        }
    }

    function getSize() {
        return $this->size;
    }
}

class DataStructure_List_Node {
    var $prev;
    var $next;
    var $data;

    function DataStructure_List_Node($newdata = null,$newprev = null,$newnext = null) {
        $this->setNext($newnext);
        $this->setPrev($newprev);
        $this->setData($newdata);
    }

    function &getNext() {
        return $this->next;
    }

    function &getPrev() {
        return $this->prev;
    }

    function &getSelf() {
        return $this;
    }

    function &getData() {
        return $this->data;
    }
    
    function setNext(&$newnext) {
        $this->next = &$newnext;
    }

    function setPrev(&$newprev) {
        $this->prev = &$newprev;
    }

    function setData(&$newdata) {
        $this->data = &$newdata;
    }

    function unsetNext() {
        $this->next = null;
    }

    function unsetPrev() {
        $this->prev = null;
    }

    function unsetData() {
        $this->data = null;
    }

    function insertListNodeAfter($node) {
        $next =& $this->getNext();
        $self =& $this->getSelf();
        $prev =& $this->getPrev();

        $node->setPrev($self);
        $node->setNext($next);

        $this->setNext($node);
        if($next != null) {
            $next->setPrev($node);
        }
    }

    function insertListNodeBefore($node) {
        $next =& $this->getNext();
        $self =& $this->getSelf();
        $prev =& $this->getPrev();

        $node->setPrev($prev);
        $node->setNext($self);

        $this->setPrev($node);
        if($prev != null) {
            $prev->setNext($node);
        }
    }
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
