#include <stdio.h>
#include <pthread.h>
#include <unistd.h>

void *print_message(void *ptr){
    char *message;
    message = (char *)ptr;
    while(1){
        printf("%s\n", message);
        sleep(1);
    }
}

int main(){
    char *str1 = "Hello World";
    char *str2 = "Goodbye World";

    pthread_t thread1, thread2;
    pthread_create(&thread1, NULL, print_message, str1);
    pthread_create(&thread2, NULL, print_message, str2);

    pthread_join(thread2, NULL);

    pthread_join(thread1, NULL);
    return 0;
}
