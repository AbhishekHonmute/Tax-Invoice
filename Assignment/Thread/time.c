#include <stdio.h>
#include <pthread.h>
#include <unistd.h>

int counter = 0;
pthread_mutex_t lock;
/* flag shows whether the hour, minutes or second thread has entered the
 * function */
void *print_time(void *flag){
    char *f;
    pthread_mutex_lock(&lock);
    f = (char *)flag;
    if (*f == 's'){
        printf("%d\n", counter % 60);
    }
    else if (*f == 'm'){
        printf("%d : ", (counter / 60) % 60);
    }
    else if (*f == 'h'){
        printf("%d : ", (counter / 3600) % 24);
    }
    pthread_mutex_unlock(&lock);
}

int main(){
    pthread_t thread_h, thread_m, thread_s;
    char flag_h = 'h', flag_m = 'm', flag_s = 's';
    while(1){
        pthread_create(&thread_h, NULL, print_time, &flag_h);
        pthread_join(thread_h, NULL);
        pthread_create(&thread_m, NULL, print_time, &flag_m);
        pthread_join(thread_m, NULL);
        pthread_create(&thread_s, NULL, print_time, &flag_s);
        pthread_join(thread_s, NULL);
        counter++;
        sleep(1);
    }    
}
