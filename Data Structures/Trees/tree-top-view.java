import java.util.*;
import java.io.*;

class Node {
    Node left;
    Node right;
    int data;

    Node(int data) {
        this.data = data;
        left = null;
        right = null;
    }
}

class Solution {


	/*

    class Node
    	int data;
    	Node left;
    	Node right;
	*/
	public static void topView(Node root) {
        class QueueObj {
            Node node;
            int place;

            QueueObj(Node node, int place)
            {
                this.node = node;
                this.place = place;
            }
        }
        Queue<QueueObj> queue = new LinkedList<QueueObj>();
        Map<Integer, Integer> map = new TreeMap<Integer, Integer>();

        queue.add(new QueueObj(root, 0));

        while(!queue.isEmpty()) {
            QueueObj obj = queue.poll();
            map.putIfAbsent(obj.place, obj.node.data);

            if (obj.node.left != null) {
                queue.add(new QueueObj(obj.node.left, obj.place - 1));
            }

            if (obj.node.right != null) {
                queue.add(new QueueObj(obj.node.right, obj.place + 1));
            }
        }

        for (Map.Entry<Integer, Integer> entry : map.entrySet()) {
            System.out.print(entry.getValue() + " ");
        }
    }

	public static Node insert(Node root, int data) {
        if(root == null) {
            return new Node(data);
        } else {
            Node cur;
            if(data <= root.data) {
                cur = insert(root.left, data);
                root.left = cur;
            } else {
                cur = insert(root.right, data);
                root.right = cur;
            }
            return root;
        }
    }

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int t = scan.nextInt();
        Node root = null;
        while(t-- > 0) {
            int data = scan.nextInt();
            root = insert(root, data);
        }
        scan.close();
        topView(root);
    }
}