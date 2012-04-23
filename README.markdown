> **This is a an experiment for the better part of it. However, if you feel this is somehow of use to you, please let me know. -- Marijn**

A basic finite state machine implementation for a lock. The implementation was inspired by a [comment from Gordon on stackoverflow][1].

I might have gone overboard namespacing the hell out of it. You might want to check the previous revisions. Any thoughts on the code or functionality are welcome.

# Usage

**A simple lock**

The idea is to create a lock and pass its state as an argument.

```php
<?php

$secret = '$3crt3t';

// Create a Lock that is locked
$lock = new Spil\Lock(new Spil\LockState\LockedState(), $secret);

// Try to unlock it with a key that won't fit
try {
    $lock->unlock(new Spil\Key("invalid"));
} catch (DomainException $e) {
    printf("Error: %s", $e->getMessage());
}

// Create a "fitting" key
$key = new Spil\Key($secret);

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

**A time lock**

Due to the flexible architecture, we can easily create time based locks.

```php
<?php

$secret = '$3crt3t';

// Create a Lock that is locked
$lock = new Spil\Lock(new Spil\LockState\TemporalLockedState(new Spil\DateRange(new DateTime('yesterday morning'), new DateTime('yesterday noon'))), $secret);

// Create a "fitting" key
$key = new Spil\Key($secret);

// Try to unlock (outside of the created timeframe)
try {
    $lock->unlock($key);
} catch (DomainException $e) {
    printf("Error: %s", $e->getMessage());
}
```

**Factory**

A factory class is available to ease the creation of locks.

```php
<?php

$secret = '$3crt3t';

$factory = new Spil\LockFactory();

// Create a Lock that is locked
$lock = $factory->createTemporalLockedLock($secret, new DateTime('yesterday morning'), new DateTime('yesterday noon'))));

// Create a "fitting" key
$key = new Spil\Key($secret);

// Try to unlock (outside of the created timeframe)
try {
    $lock->unlock($key);
} catch (DomainException $e) {
    printf("Error: %s", $e->getMessage());
}
```

[1]: http://stackoverflow.com/questions/4274031/php-state-machine-framework#answer-4275232