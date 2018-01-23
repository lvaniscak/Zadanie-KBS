<?php

namespace App\Hobbies;


use App\Repositories\EloquentUserRepository;
use InvalidArgumentException;
use LogicException;


class HobbyComparator
{
    protected $userRepository;
    protected $hobbies = ['swimming', 'running', 'cycling', 'tourism', 'climbing'];

    public function __construct(EloquentUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function compare($email)
    {
        $expected_user = $this->userRepository->findBy('email', $email);
        if (!$expected_user) {
            throw new InvalidArgumentException("Email missing");
        }

        $expected_hobbies = $this->userRepository->getUserHobbies($expected_user->id);

        $users = $this->userRepository->findAllExcept($expected_user->id);

        if (!$users) {
            throw new LogicException("No users to compare");
        }
        $list = array();


        foreach ($users as $user) {

            try {
                $match = 0;
                $userHobbies = $this->userRepository->getUserHobbies($user['id']);
                if ($userHobbies != null) {
                    foreach ($this->hobbies as $value) {

                        $match = $match + abs($userHobbies->$value - $expected_hobbies->$value) * 20;

                    }
                    $match = 100 - $match / 5;
                    $list [$user->email] = $match;
                }
            } catch (\Exception $e) {
                abort(422, 'Problem during processing');

            }


        }

        return $list;
    }
}
