;defined the function factorial 
(defun factorial (n)    
  (if (= n 0)
    (return-from factorial 1)
  )
    (return-from factorial (* n (factorial (- n 1))))
  
)

(write (factorial (read)))
