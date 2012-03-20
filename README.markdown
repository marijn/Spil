A basic finite state machine implementation for a lock. The implemntation was inspired by a [comment from Gordon on stackoverflow][1].

# Usage

```php
<?php

$secret = '$3crt3t';

// Create a Lock that is locked
$lock = new Lock(new LockedState(), $secret);

// Try to unlock it with a key that won't fit
try {
    $lock->unlock(new Key("invalid"));
} catch (DomainException $e) {
    printf("Error: %s", $e->getMessage());
}

// Create a "fitting" key
$key = new Key($secret);

if ($lock->unlock($key)) {
    print("Welcome!");
}

// Try to unlock what is already unlocked
try {
    $lock->unlock($key);
} catch (DomainException $e) {
    printf("Error: %s", $e->getMessage());
}
```

[1]: http://stackoverflow.com/questions/4274031/php-state-machine-framework