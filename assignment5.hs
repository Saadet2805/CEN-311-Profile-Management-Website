--exercise 1
isPalindrome :: String -> Bool
isPalindrome "" = True
isPalindrome [_] = True
isPalindrome [x : xs] = x == last xs && isPalindrome(init xs)

--exercise 2
abs' ::(Num a, Ord a) => a -> a
abs' x
    | x >= 0 = x
    | otherwise = negate x

--exercise 3
initials :: String -> String -> String
initials firstName lastName = [head firstName, '.', head lastName]
    
--exercise 4
length' :: Num b => [a] -> b
length' [] = 0
length' [_ : xs]  = 1 + length' xs

--exercise 5
sumOfSquares :: (Num a) => [a] -> a
sumOfSquares [] = 0
sumOfSquares xs = sum [x ^ 2 | x <- xs]

--exercise 6 take an eq and a num a (test for equality), take a function which maps b to b, and b, and return b, 
applyTimes :: (Eq a, Num a) => a -> (b -> b) -> b -> b
--base case: a number is less than or equal to 0, 
applyTimes 0 _ b = x
applyTimes n f x = f (applyTimes (n-1) f x)

--exercise 7
mult :: Integral a => a -> a -> a
mult 0 _ = 0
mult _ 0 = 0
mult x y
    |y > 0 = x + mult x (y-1)
    |otherwise = negate $ mult x (-y) --if it is a negative number transform it to positive and negate the mult at the end, use dollar sign to create precedence (so negation is done at the end)
    
--exercise 9
mc91 :: (Integral a) => a -> a
--use guards and check if the number is greater or less than a 100
mc91 x
    | x > 100 = x - 10
    | otherwise = applyTimes 2 mc91 (x + 11)
    
--exercise 10 - use folding functions
myAnd :: [Bool] -> Bool
myAnd =  foldr (&&) True  