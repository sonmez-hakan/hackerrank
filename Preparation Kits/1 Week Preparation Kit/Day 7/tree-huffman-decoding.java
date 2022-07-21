void decode(String s, Node root) {
    Node tmp = root;
    String result = "";
    for (int x = 0, l = s.length(); x < l; x++) {
        if (s.charAt(x) == '1') {
            tmp = tmp.right;
        } else {
            tmp = tmp.left;
        }

        if (tmp.left == null && tmp.right == null) {
            result += tmp.data;
            tmp = root;
        }
    }

   System.out.print(result);
}