//java 7
public static void preOrder(Node root) {
    System.out.print(root.data + " ");

    if (root.left != null) {
        preOrder(root.left);
    }

    if (root.right != null) {
       preOrder(root.right);
    }
}