#include <stdio.h>
void recursion(int n){
    if (n == 0)
        return;
    printf("%d\n", n);
    recursion(--n);
}

void main(){
    int n;
    scanf("%d", &n);    
    recursion(n);
}
