static SinglyLinkedListNode mergeLists(SinglyLinkedListNode head1, SinglyLinkedListNode head2) {
   SinglyLinkedListNode result = new SinglyLinkedListNode(0);
    SinglyLinkedListNode temp = result;
    SinglyLinkedListNode last = null;
    while (head1 != null || head2 != null)
    {
        temp.next = new SinglyLinkedListNode(0);
        if (head1 == null)
        {
            temp.data = head2.data;
            head2 = head2.next;
        }
        else if (head2 == null)
        {
            temp.data = head1.data;
            head1 = head1.next;
        }
        else if (head1.data > head2.data)
        {
            temp.data = head2.data;
            head2 = head2.next;
        }
        else
        {
            temp.data = head1.data;
            head1 = head1.next;
        }
        last = temp;
        temp = temp.next;
    }
    last.next = null;

    return result;
}