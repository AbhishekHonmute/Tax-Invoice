#include <stdio.h>
#include <pthread.h>
#include <unistd.h>
void *func(void *arg) {
    while (1){
        printf("Hello World\n");
        sleep(1);
    }
}

int main(){
    pthread_t thread_id;
    pthread_create(&(thread_id), NULL, func, NULL);
    pthread_join(thread_id, NULL);
    return 0;
}

