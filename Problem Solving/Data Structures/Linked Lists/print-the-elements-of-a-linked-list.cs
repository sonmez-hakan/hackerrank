static void printLinkedList(SinglyLinkedListNode head) {
    while (head != null) {
        Console.WriteLine(head.data);
        head = head.next;
    }
}