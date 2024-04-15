<?php
namespace App\Ysiroteno\PhpDataStructures\Tree;

class BinaryTree implements BinaryTreeInterface
{
    private ?Node $root = null;

    private string $output = '';

    /**
     * Предполагается, что дерево не пустое
     *
     * {@inheritDoc}
     * @see \App\Ysiroteno\PhpDataStructures\Tree\BinaryTreeInterface::find()
     */
    public function find(int $key): ?string
    {
        /**
         * Начать поиск с корневого элемента дерева
         *
         * @var \App\Ysiroteno\PhpDataStructures\Tree\Node $current
         */
        $current = $this->root;

        /**
         * Осуществляем перебор пока не было найдено
         * совпадение
         */
        while ($current->getKey() !== $key) {
            /**
             * В бинарном дереве левая нода всегда
             * меньше родителя, а правая больше или равна
             * ролителя
             *
             * Если искомое значение ключа ноды меньше
             * текущей перебираемой, тогда верный путь
             * к искомой ноде - это налево
             */
            if ($key < $current->getKey()) {
                $current = $current->getLeftChild();
            } else {
                /**
                 * В противном случае нужно идти
                 * направо
                 */
                $current = $current->getRightChild();
            }

            /**
             * Если родитель не содержит потомков, то
             * прекращаем поиск
             */
            if ($current === null) {
                return null;
            }
        }

        /**
         * Если элемент был найден, то
         * возвращаем его значение
         */
        return $current->getValue();
    }

    public function insert(int $key, string $value): self
    {
        $newNode = (new Node())
            ->setKey($key)
            ->setValue($value);

        /**
         * Если это первый элемент в дереве, то
         * делаем его корневым
         */
        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            /**
             * Если корневой узел занят, то начинаем вставку
             * далее за корнем
             */
            $current = $this->root;

            while (true) {
                $parent = $current;
                /**
                 * Немного подробнее про узлы в методе find
                 * Решаем, двигаться ли влево
                 */
                if ($key < $current->getKey()) {
                    /**
                     * Двигаемся налево
                     */
                    $current = $current->getLeftChild();

                    /**
                     * Если достигли конца цепочки, то
                     * вставляем слева и выходим
                     */
                    if ($current === null) {
                        $parent->setLeftChild($newNode);
                        return $this;
                    }
                } else {
                    /**
                     * Идем в правую часть
                     * дерева
                     */
                    $current = $current->getRightChild();

                    /**
                     * Если достигнут конец цепочки, то
                     * вставляем новый узел справа и выходим
                     */
                    if ($current === null) {
                        $parent->setRightChild($newNode);
                        return $this;
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Обход дерева через симметричный алгоритм в котором применяется
     * рекурсия
     *
     * {@inheritDoc}
     * @see \App\Ysiroteno\PhpDataStructures\Tree\BinaryTreeInterface::inOrderAsString()
     */
    public function inOrder(?Node $localRoot = null): void
    {
        if ($localRoot !== null) {
            $this->inOrder($localRoot->getLeftChild());

            $this->output .= $localRoot->getValue() . "\n";

            $this->inOrder($localRoot->getRightChild());
        }
    }

    public function inOrderCollect(): string
    {
        $this->output = '';
        $this->inOrder($this->root);

        return $this->output;
    }
}

