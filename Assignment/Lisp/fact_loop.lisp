(defun fact_loop(n)             ;defined the function to find the factorial of n
    (setq a 1)                  ;initializing the variable a to 1
    (loop for i from 1 to n     ;running the loop from 1 to n
          do( setq a (* a i))   ;1st iter: a=1*1  2nd iter:a=1*2 3rd iter:a=2*3 and so on 
    )
    (write a)
)

(fact_loop (read))
