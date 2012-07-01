<?php

/**
 * \brief
 *      Interface to create an external Iterator.
 *
 * \see
 *      http://php.net/IteratorAggregate
 */
interface Iterator {
    /**
     * Retrieve an external iterator.
     *
     * \retval Traversable
     *      An instance of an object implementing Iterator or Traversable
     *
     * \see
     *      http://php.net/manual/en/iteratoraggregate.getiterator.php
     */
    public function getIterator();
}
